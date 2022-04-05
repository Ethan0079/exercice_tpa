import React from 'react';
import {useState} from 'react';

export class ContactList extends React.Component {
    state = {
        contacts: []
    }

    fetchContacts() {
        // make fetch request
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "text/plain");

        var requestOptions = {
            method: 'GET',
            headers: myHeaders
        };

        fetch("http://exercice-tpa/rest-api/contact/read.php", requestOptions)
            .then(response => response.text())
            .then(response => console.log(response))
            .then(response => this.setState({ contacts: response }))
            .catch(error => console.log('error', error));
    }
    
    componentWillUnmount() {
        // make fetch request
    }
    
    render() {
        return (
            <>
                <button onClick={this.fetchContacts}>Load Contacts</button>
                <ul>
                    {this.state.contacts.map((contact) => (
                        <li key={contact}>{contact}</li>
                    ))}
                </ul>
            </>
        )
    }


}