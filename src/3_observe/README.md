# Observe Pattern là gì?

* Observe Pattern là một trong những Pattern thuộc nhóm hành vi (Behavior Pattern)
* Nó định nghĩa mối phụ thuộc một – nhiều giữa các đối tượng để khi mà một đối tượng có sự thay đổi trạng thái, tất các thành phần phụ thuộc của nó sẽ được thông báo và cập nhật một cách tự động.

* 1 Template method thường sẽ có 
* Interface class Subject và Concrete Class implements Interface class Subject 
* Interface Observe và Concrete Class implements Interface Observe

# Lợi ích 
* Dễ dàng mở rộng với ít sự thay đổi nó đảm bảo nguyên tắc Open/Closed Principle (OCP) SOLID
* Sự thay đổi trạng thái ở 1 đối tượng có thể được thông báo đến các đối tượng khác mà không phải giữ chúng liên kết quá chặt chẽ.
* Một đối tượng có thể thông báo đến một số lượng không giới hạn các đối tượng khác.

# Dùng khi nào
* Khi thay đổi một đối tượng, yêu cầu thay đổi đối tượng khác và chúng ta không biết có bao nhiêu đối tượng cần thay đổi, những đối tượng này là ai.
* Sử dụng trong ứng dụng broadcast-type communication.
* Sử dụng để quản lý sự kiện (Event management).
* Sử dụng trong mẫu mô hình MVC (Model View Controller Pattern) : trong MVC, mẫu này được sử dụng để tách Model khỏi View. View đại diện cho Observer và Model là đối tượng Observable.