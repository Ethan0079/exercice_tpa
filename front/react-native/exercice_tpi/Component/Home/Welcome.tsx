import * as React from 'react';
import {useState} from 'react';
import { View } from 'react-native';
import { CreateContact } from '../Contact/CreateContact';
import { DeleteContact } from '../Contact/DeleteContact';
import { GetContactsList } from '../Contact/GetContacts';
import { UpdateContact } from '../Contact/UpdateContact';

export default function Welcome() {
    const h1Style = {
        marginTop: 20,
        marginBottom: 20,
        marginLeft: "auto",
        marginRight: "auto",
        color: '#FFBF00',
        width: '150px',
        border: 'none',
        padding: '10px 20px',
        fontFamily: 'Arial',   
      };


    return(
        <>
          <h1 style={h1Style}>Welcome</h1>
          <GetContactsList />
          <CreateContact />
          <UpdateContact />
          <DeleteContact />
        </>
    );
}