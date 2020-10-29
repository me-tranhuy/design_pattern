# Strategy Pattern là gì?
* Strategy Pattern là một trong những Pattern thuộc nhóm hành vi (Behavior Pattern)
* Nó là (mẫu chiến lược) cho phép định nghĩa tập hợp các thuật toán, đóng gói từng thuật toán lại, 
và dễ dàng thay đổi linh hoạt các thuật toán bên trong object con. 
* Strategy cho phép thuật toán biến đổi độc lập khi người dùng sử dụng chúng.
* Ý nghĩa thực sự của Strategy Pattern là giúp tách rời phần xử lý một chức năng cụ thể ra khỏi đối tượng. 
* Sau đó tạo ra một tập hợp các thuật toán để xử lý chức năng đó và lựa chọn thuật toán nào mà chúng ta thấy đúng đắn nhất khi thực thi chương trình. 

* 1 Strategy pattern thường sẽ có interface class và Concrete Class

# Lợi ích 
* Đảm bảo nguyên tắc Single responsibility principle (SRP) : SRP là nguyên lý SOLID một lớp không thể định nghĩa nhiều hành vi và chúng xuất hiện dưới dạng với nhiều câu lệnh có điều kiện. 
* Thay vì nhiều điều kiện, chúng ta sẽ chuyển các nhánh có điều kiện liên quan vào lớp Strategy riêng lẻ của nó.
* Đảm bảo nguyên tắc Open/Closed Principle (OCP) : chúng ta dễ dàng mở rộng và kết hợp hành vi mới mà không thay đổi ứng dụng.

# Dùng khi nào
* Khi muốn có thể thay đổi các thuật toán được sử dụng bên trong một đối tượng tại thời điểm run-time.
* Khi có một đoạn mã dễ thay đổi, và muốn tách chúng ra khỏi chương trình chính để dễ dàng bảo trì.