import React, { useState } from "react";
import ReactDOM from 'react-dom';
import { IContact } from "../../Interface/IContact";

export function UpdateContact() {
    const [contacts, setContacts] = React.useState<IContact[]>([]);


    const [id, setId] = useState("");
    const [firstname, setFirstname] = useState("");
    const [lastname, setLastname] = useState("");
    const [age, setAge] = useState("");
    const [email, setEmail] = useState("");
    const [tel_number, setTel_number] = useState("");

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        "id": id,
        "firstname": firstname,
        "lastname": lastname,
        "age": age,
        "email": email,
        "tel_number": tel_number
    });
    
    // const DisplayContacts = contacts.map(
    //     (contact) => { return (
    //         <tr key={contact.id}>
    //           <td>{contact.id}</td>
    //           <td>{contact.firstname}</td>
    //           <td>{contact.lastname}</td>
    //           <td>{contact.age}</td>
    //           <td>{contact.email}</td>
    //           <td>{contact.tel_number}</td>
    //         </tr>
    //       )  
    //   });
    //   const DisplayContact = () => contacts.map(
    //     (contact) => { 
    //         console.log(contact.id);
    //         setFirstname(contact.firstname);
    //         setLastname(contact.lastname);
    //         setAge(contact.age.toString());
    //         setEmail(contact.email);
    //         setTel_number(contact.tel_number.toString());
    //     }
    //   );
    
    // const getContactById = () => {
    //  fetch("http://exercice-tpa/rest-api/contact/read.php?id=" + id)
    //         .then((response) => response.json())
    //         .then((result) => setContacts(result.contact))
    //         .catch(error => console.log('error', error));
    //     // DisplayContact();
    //     // console.log(raw)
    // };

    var requestOptions = {
        method: 'POST',
        body: raw
    };
    const updateContact = (event: { preventDefault: () => void; }) => {
        fetch("http://exercice-tpa/rest-api/contact/update.php", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
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
    const formStyle = {
        marginTop: 20,
        marginBottom: 20,
        marginLeft: "auto",
        marginRight: "auto",
        color: 'white',
        border: 'none',
        padding: '10px 20px',
    };
    const labelStyle = {   
        color: 'white',
        fontFamily: 'Arial',
        padding: '5px 10px 5px 0px',
        marginRight: '20px',
    };
    const inputStyle = {   
        fontFamily: 'Arial',
        padding: '5px 10px',
        marginLeft: '20px',
        maxWidth: '100px',
    };

  return (
    
    <>
    {/* <table>
    <tbody>
        {DisplayContacts}
    </tbody>
    </table> */}
        {/* <form style={formStyle}>
            <label style={labelStyle}>
                ID :
                <input style={inputStyle} type="number" value={id} onChange={(e) => setId(e.target.value)} />
            </label>  
        </form>
        <button style={buttonStyle} onClick={getContactById}>Get Contact</button> */}

        <form style={formStyle} onSubmit={updateContact}>
            <label style={labelStyle}>
                ID :
                <input style={inputStyle} type="number" value={id} onChange={(e) => setId(e.target.value)} />
            </label>
            <label style={labelStyle}>
                Prénom :
                <input style={inputStyle} type="text" value={firstname} onChange={(e) => setFirstname(e.target.value)} />
            </label>
            <label style={labelStyle}>
                Nom :
                <input style={inputStyle} type="text" value={lastname} onChange={(e) => setLastname(e.target.value)} />
            </label>
            <label style={labelStyle}>
                Age :
                <input style={inputStyle} type="number" value={age} onChange={(e) => setAge(e.target.value)} />
            </label>
            <label style={labelStyle}>
                Email :
                <input style={inputStyle} type="email" value={email} onChange={(e) => setEmail(e.target.value)} />
            </label>
            <label style={labelStyle}>
                Téléphone :
                <input style={inputStyle} type="number" value={tel_number} onChange={(e) => setTel_number(e.target.value)} />
            </label>

            <input style={buttonStyle} type="submit" value="Envoyer" />
        </form>

    </>
  );
}
