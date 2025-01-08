<form method="POST" action="{{ route('register.save') }}">
    @csrf
    <label for="TenDangNhap">Tên đăng nhập:</label>
    <input type="text" name="TenDangNhap" required>
    
    <label for="Email">Email:</label>
    <input type="email" name="Email" required>

    <label for="MatKhau">Mật khẩu:</label>
    <input type="password" name="MatKhau" required>

    <label for="MatKhau_confirmation">Xác nhận mật khẩu:</label>
    <input type="password" name="MatKhau_confirmation" required>

    <label for="VaiTro">Vai trò:</label>
    <input type="text" name="VaiTro" required>

    <button type="submit">Đăng ký</button>
</form>
