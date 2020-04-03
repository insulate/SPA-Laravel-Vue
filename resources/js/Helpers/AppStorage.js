/*
การใช้งาน Web Storage แบ่งออกเป็น 2 ส่วนด้วยกันคือ
Local Storage คือ การเก็บข้อมูลใส่ Local Storage แบบถาวร ข้อมูลจะหายไปก็ต่อเมื่อ clear Storage หรือกำหนดเวลาวันหมดอายุ
Session Storage คือ การเก็บข้อมูลใส่ Session Storage ซึ่งเมื่อปิดเว็บบราวเซอร์ข้อมูลก็จะหายไปหรือกำหนดระยะเวลาวันหมดอายุ
 */
class AppStorage{
    storeToken(token){
        localStorage.setItem('token', token);
    }

    storeUser(user){
        localStorage.setItem('user', user);
    }

    store(user,token){
        this.storeToken(token);
        this.storeUser(user);
    }

    clear(){
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }

    getToken(){
        return localStorage.getItem('token');
    }

    getUser(){
        return localStorage.getItem('user');
    }
}

export default AppStorage = new AppStorage();
