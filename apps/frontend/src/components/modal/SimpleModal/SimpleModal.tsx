import React from "react";
import Modal from '@material-ui/core/Modal';
import './SimpleModal.css'

const SimpleModal = (props: any) => {
    const cssClass = () => {
        return `simpleModal ${props.modalClass}`
    }
    return (
        <Modal open={props.open}
               onClose={props.onClose}
        >
            <div className={cssClass()}>
                {props.children}
            </div>
        </Modal>
    );
}

export {SimpleModal}