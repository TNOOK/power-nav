import React from 'react';
import TextField from '@material-ui/core/TextField';
import './TextInput.css';

const TextInput = (props: { label: string, className?: string, type?: string }) => {
    return(
        <TextField
            id={`outlined-${props.label}`}
            label={props.label}
            variant="outlined"
            className={`inputText ${props.className && props.className} `}
            type={props.type ? props.type : ''}
        />
    );
}

export {TextInput}