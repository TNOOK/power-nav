import React from 'react';
import Button from '@material-ui/core/Button';
import './FormButton.css';

const FormButton = (props: { label: string, callback: Function, className?: string }) => {
    return (
        <Button
            className={`formButton ${props.className ? props.className : ''}`}
            onClick={() => props.callback()}
        >{props.label}</Button>
    );
}

export {FormButton}
