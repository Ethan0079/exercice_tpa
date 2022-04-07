import React from 'react';
import {useState} from 'react';
import { IContact } from './Interface/IContact';

// export interface IContact {
//     id: number;
//     firstname: string;
//     lastname: string;
//     age: number;
//     email: string;
//     tel_number:number;
// }

export class ContactList extends React.Component {
    // public contacts: any = { contacts: [] as IContact[] };

    constructor(props: IContact[]) {
        console.log("inside construct");
        super(props);

        this.state = {
            contacts: [] as IContact[]
        };
    }

    // test = () => {
    //     this.setState({contacts: this.contacts.Contacts});
    // }

    fetchContacts() {
        // make fetch request
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json; charset=utf-8");
        // myHeaders.append("Access-Control-Allow-Origin", "*");
        myHeaders.append("Mode", "CORS");

        var requestOptions = {
            method: "GET",
            headers: myHeaders
        };

        fetch("http://exercice-tpa/rest-api/contact/read.php", requestOptions)
            // .then(async (response) => JSON.parse(await response.text()))
            .then((response) => response.json())
            // .then(data => console.log(data))
            .then(data => this.setState({ contacts: data.contacts }) )
            .catch(error => console.log('error', error));
    }
    
    render() {
        return (
            <>
                <button onClick={this.fetchContacts}>Load Contacts</button>
                <ul>
                    {this.state.contacts.map((contact: IContact) => (
                        <li key={contact.id}>{contact.firstname}</li>
                    ))}
                </ul>
                {/* <p>{this.state.contacts}</p> */}
            </>
        )
    }


}

