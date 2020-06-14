import React from 'react';
import './Login.css';
import {TextInput} from "../../components/input/textinput/TextInput";
import {PasswordInput} from "../../components/input/PasswordInput/PasswordInput";
import {FormButton} from "../../components/button/FormButton/FormButton";
import {RegisterModal} from "../../components/modal/RegisterModal/RegisterModal";
import {ForgotPasswordModal} from "../../components/modal/ForgotPasswordModal/ForgotPasswordModal";

class Login extends React.Component<any, any> {
    constructor(props: any) {
        super(props);
        this.state = {
            registerModal: false,
            forgotPasswordModal: false
        }
    }

    openRegisterModal = () => {
        this.setState({
            registerModal: true
        })
    }

    openForgotPasswordModal = () => {
        this.setState({
            forgotPasswordModal: true
        })
    }

    closeRegisterModal = () =>{
        this.setState({
            registerModal: false
        })
    }

    closeForgotPasswordModal = () =>{
        this.setState({
            forgotPasswordModal: false
        })
    }
    render() {
        return (
            <div className='Login'>
                <Title/>
                <SignIn/>
                <Footer openRegisterModal={this.openRegisterModal} openForgotPasswordModal={this.openForgotPasswordModal}/>
                <RegisterModal
                    open={this.state.registerModal}
                    onClose={this.closeRegisterModal}
                />
                <ForgotPasswordModal
                    open={this.state.forgotPasswordModal}
                    onClose={this.closeForgotPasswordModal}
                />
            </div>
        );
    }
}

const Title = () => {
    return (
        <header className='title'>
            <h1 className='title-mainTitle'>Bienvenido</h1>
            <h2 className='title-subTitle'>Introduce los datos para continuar</h2>
        </header>
    );
}

const SignIn = () => {
    return (
        <form className='SignIn'>
            <TextInput label='Email' className='SignIn-email'/>
            <PasswordInput label='Contraseña' className='SignIn-password'/>
            <FormButton label='ENTRAR' callback={() => {
            }} className='SignIn-formButton'/>
        </form>
    );
}

const Footer = (props: any) => {
    return (
        <footer className='Login-footer'>
            <p onClick={props.openForgotPasswordModal}>Recuperar contraseña</p>
            <p onClick={props.openRegisterModal}>Crear cuenta</p>
        </footer>
    );
}
export default Login;
