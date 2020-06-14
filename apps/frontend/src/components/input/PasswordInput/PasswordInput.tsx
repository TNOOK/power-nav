import React from "react";
import {TextInput} from "../textinput/TextInput";

const PasswordInput = (props: any) => {
    return(<TextInput type='password' {...props}/>);
}

export {PasswordInput}