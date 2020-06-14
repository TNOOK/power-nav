import React from 'react';
import {SimpleModal} from '../SimpleModal/SimpleModal';
import {TextInput} from "../../input/textinput/TextInput";
import './ForgotPasswordModal.css';
import {FormButton} from "../../button/FormButton/FormButton";

const ForgotPasswordModal = (props: any) => {
    return(
        <SimpleModal modalClass='simpleModal-forgotPasswordModal' {...props}>
            <div className='forgotPasswordModal'>
                <h2 className='registerModal-title'>Recuperar contraseña</h2>
                <TextInput label='Email' className='registerModal-email'/>
                <Footer onClose={props.onClose}/>
            </div>
        </SimpleModal>
    );
}

const Footer = (props: any) => {
    return (
        <div className='footer'>
            <FormButton label='CANCELAR' callback={props.onClose} className='footer-cancel'/>
            <FormButton label='ENVIAR' callback={() => {}} />
        </div>
    );
}

export {ForgotPasswordModal}