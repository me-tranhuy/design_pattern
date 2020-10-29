<?php 

abstract class PageTemplatePattern {
 
    public function showHeader() {
        echo "Header  <br>";
    }
 
    public function showNavigation() {
        echo "Nav <br>";
    }
 
    public function showFooter() {
        echo "Footer <br>";
    }
 
    abstract public function showBody();
 
    // trọng tâm template method pattern la final class
    public final function showPage() {
        $this->showHeader();
        $this->showNavigation();
        $this->showBody();
        $this->showFooter();
    }
}

/************** Home Page *****************/
class HomePage extends PageTemplatePattern {
 
    public function showBody() {
        echo "Content of home page at here <br>";
    }
}

/************** Contact Page *****************/
class ContactPage extends PageTemplatePattern {
 
    public function showBody() {
        echo "Content of contact page at here <br>";
    }
}

/************** Product Page *****************/
class ProductPage extends PageTemplatePattern {
 
    public function showFooter() {
        echo "Not show Footer at Product Page <br>" ;
    }

    public function showBody() {
        echo "Content of Product page at here <br>";
    }
}

echo "<h3>";
echo "Page Product <br>";
$ProductPage = new ProductPage();
$ProductPage->showPage();

echo "<br><br>";

$homePage = new HomePage();
$homePage->showPage();

echo "</h3>";


