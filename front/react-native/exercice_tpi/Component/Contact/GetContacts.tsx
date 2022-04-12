import React from "react";
import { IContact } from "../../Interface/IContact";


export function GetContactsList() {
  const [contacts, setContacts] = React.useState<IContact[]>([]);

  const getContacts = () => {
   fetch("http://exercice-tpa/rest-api/contact/read.php")
      .then((response) => response.json())
      .then(data => setContacts(data.contact))
      .catch(error => console.log('error', error));
  };
  const buttonStyle = {
    marginTop: 20,
    marginBottom: 20,
    marginLeft: "auto",
    marginRight: "auto",
    backgroundColor: '#FFBF00',
    color: 'white',
    width: '150px',
    border: 'none',
    padding: '10px 20px',
  };
  const DisplayContact = contacts.map(
    (contact) => {
      return (
        <tr key={contact.id}>
          <td>{contact.id}</td>
          <td>{contact.firstname}</td>
          <td>{contact.lastname}</td>
          <td>{contact.age}</td>
          <td>{contact.email}</td>
          <td>{contact.tel_number}</td>
        </tr>
      )
  });

  return (
    <>
      <button style={buttonStyle} onClick={getContacts}>Get contacts</button>
      {/* <ul>
          {contacts ? contacts.map((contact: IContact) => (
              <li key={contact.id}>{contact.firstname}</li>
          )) : null }    
      </ul> */}

      <table style={{backgroundColor: "#f5f5f5", textAlign: "center"}}>
        <thead>
          <tr style={{backgroundColor: "#f1f1f1"}}>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone Number</th>
          </tr>
        </thead>
        <tbody>
          {DisplayContact}
        </tbody>
      </table>
    </>
  );
}
