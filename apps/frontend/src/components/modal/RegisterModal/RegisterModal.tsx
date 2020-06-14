import React from 'react';
import {SimpleModal} from '../SimpleModal/SimpleModal';
import {TextInput} from "../../input/textinput/TextInput";
import {PasswordInput} from "../../input/PasswordInput/PasswordInput";
import './RegisterModal.css';
import {FormButton} from "../../button/FormButton/FormButton";

const RegisterModal = (props: any) => {
    return(
        <SimpleModal modalClass='simpleModal-registerModal' {...props}>
            <div className='registerModal'>
                <h2 className='registerModal-title'>Crear cuenta</h2>
                <TextInput label='Nombre' className='registerModal-name'/>
                <TextInput label='Email' className='registerModal-email'/>
                <PasswordInput label='Contraseña' className='registerModal-password'/>
                <Footer onClose={props.onClose}/>
            </div>
        </SimpleModal>
    );
}

const Footer = (props: any) => {
    return (
        <div className='footer'>
            <FormButton label='CANCELAR' callback={props.onClose} className='footer-cancel'/>
            <FormButton label='CREAR' callback={() => {}} />
        </div>
    );
}

export {RegisterModal}