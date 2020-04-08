import Token from './Token';
import AppStorage from './AppStorage'
class User {
    //function สำหรับ Login หากล็อคอินสำเร็จจะคืนค่า access_token, token_type, expires_in, user หลังจากนั้นส่งไป function responseAfterLogin
    login(data){
        axios.post('/api/auth/login', data)
            .then(res => this.responseAfterLogin(res))
            .catch(error => console.log(error.response.data));
    }

    //function สำหรับเก็บข้อมูล Local Storage
    responseAfterLogin(res){
        const access_token = res.data.access_token;
        const username = res.data.user;
        if(Token.isValid(access_token)){
            AppStorage.store(username,access_token);
            window.location = '/forum';
        }
    }

    hasToken(){
        const storedToken = AppStorage.getToken();
        if(storedToken){
            return Token.isValid(storedToken) ? true : false;
        }
        return false;
    }

    loggedIn(){
        return this.hasToken();
    }

    logout(){
        AppStorage.clear();
        window.location = '/forum';
    }

    name(){
        if(this.loggedIn){
            return AppStorage.getUser();
        }
    }

    id(){
        if(this.loggedIn){
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub;
        }
    }

    own(id){
        return this.id() == id;
    }

    admin(){
        if(this.loggedIn()){
            return this.id() == 35;
        }
        return false;
    }
}

export default User = new User();
