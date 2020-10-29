# Template Method Pattern là gì?

* Template Method Pattern là một trong những Pattern thuộc nhóm hành vi (Behavior Pattern)
* Nó Định nghĩa một bộ khung của một thuật tính toán trong một chức năng, sau đó chuyển giao việc thực hiện bộ khung đó cho các lớp con. 
* Mẫu Template Method cho phép lớp con định nghĩa lại cách thực hiện của một thuật toán, 
mà không phải thay đổi cấu trúc thuật toán

* 1 Template method thường sẽ có abstract class vả Concrete Class

# Lợi ích 
* Tái sử dụng code (reuse), 
* Tránh trùng lặp code (duplicate): đóng gói phần trùng lặp vào trong lớp cha (abstract class).
* Cho phép người dùng override chỉ một số phần nhất định của thuật toán lớn, 
* Làm cho chúng ít bị ảnh hưởng hơn bởi những thay đổi xảy ra với các phần khác của thuật toán.

# Dùng khi nào
* Khi có một thuật toán với nhiều bước và mong muốn cho phép tùy chỉnh chúng trong lớp con.
* Mong muốn chỉ có một triển khai phương thức trừu tượng duy nhất của một thuật toán.
* Hành vi chung giữa các lớp con nên được đặt ở một lớp chung.