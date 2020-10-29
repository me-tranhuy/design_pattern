<?php
interface Subject {
   
    public function attach ( Observer $observer );
    public function detach ( Observer $observer );
    public function notify ();
}

interface Observer {
    
    public function update ( Subject $subject ); 
}


class AddedComment implements Subject
{
    
    protected $observers = [];
    public $comment_text;
    public $post_id;
    public function __construct($comment_text, $post_id)
    {
        $this->comment_text = $comment_text;
        $this->post_id = $post_id;
    }

    /**
     * Add an observer (such as EmailAuthor, EmailOtherCommentators or IncrementCommentCount) to $this->observers so we can cycle through them later
     */
    public function attach(Observer $observer)
    {
        $key = spl_object_hash($observer);
        $this->observers[$key] = $observer;
        return $this;
    }

    /**
     * Remove an observer from $this->observers
     */
    public function detach(Observer $observer)
    {
        $key = spl_object_hash($observer);
        unset($this->observers[$key]);
    }


    /**
     * Go through all of the $this->observers and fire the ->update() method.
     * (In Laravel and other frameworks it would often be called the ->handle() method.)
     */
    public function notify()
    {
        // echo "<pre>";
        // print_r($this->observers);

        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

/**
 * Class EmailAuthor
 * When ->update is called it should email the author of the blog post id.
 *
 */
class EmailAuthor implements Observer
{
    public function update(Subject $subject)
    {
        echo __METHOD__ . "  :  Emailing the author of post id: " . $subject->post_id . " that someone commented with : " . $subject->comment_text . "<br><br>";
    }
}

/**
 * Class EmailOtherCommentators
 * When ->update() is called it should email other comment authors who have also commented on this blog post
 */
class EmailOtherCommentators implements Observer
{
    public function update(Subject $subject)
    {
        echo __METHOD__ . "  :  Emailing all other comment authors who commented on blog post id " . $subject->post_id . " that someone commented with : " . $subject->comment_text . "<br><br>";
    }
}

/**
 * Class IncrementCommentCount
 * Add 1 to the comment count column for the blog post.
 */
class IncrementCommentCount implements Observer
{
    public function update(Subject $subject)
    {
        echo __METHOD__ . "  :   Updating comment count to + 1 for blog post id: " . $subject->post_id ."<br><br>";
    }
}

$new_comment = 'Hello, world';
$blog_post_id = 88888;


// create a blog post here...
echo "<h3>";

echo "Event Created Blog Post <br><br>"; 


$addedComment = new AddedComment($new_comment, $blog_post_id); // << the subject


$class_observers = IncrementCommentCount::class . ', ' . EmailOtherCommentators::class . ', '. EmailAuthor::class;


echo "Adding class ({$class_observers}) observers to subject Comment<br><br>";


/*****  attach objects observe subject Comment  ****/

$addedComment->attach(new IncrementCommentCount())
             ->attach(new EmailOtherCommentators())
             ->attach(new EmailAuthor());  // << adding the 3 observers



echo "Now going to notify() them...<br><br>";


$addedComment->notify();

echo "Done<br>";
echo "</h3>";

