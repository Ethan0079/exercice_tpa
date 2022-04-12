import React, { useState } from "react";
import ReactDOM from 'react-dom';

export function CreateContact() {
    const [firstname, setFirstname] = useState("");
    const [lastname, setLastname] = useState("");
    const [age, setAge] = useState("");
    const [email, setEmail] = useState("");
    const [tel_number, setTel_number] = useState("");

    // var myHeaders = new Headers();
    // myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        "firstname": firstname,
        "lastname": lastname,
        "age": age,
        "email": email,
        "tel_number": tel_number
    });
    
    var requestOptions = {
        method: 'POST',
        body: raw
    };

    const createContact = (event: { preventDefault: () => void; }) => {
        fetch("http://exercice-tpa/rest-api/contact/create.php", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
        // alert(`The name you entered was: ${firstname}`);
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
        // backgroundColor: '#FFBF00',
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
        marginLeft: "20px",
        maxWidth: '100px',
    };

  return (
    <form style={formStyle} onSubmit={createContact}>
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
            <input style={inputStyle} type="number" value={age} onChange={(e) => setAge(e.target.value)}/>
        </label>
        <label style={labelStyle}>
            Email :
            <input style={inputStyle} type="email" value={email} onChange={(e) => setEmail(e.target.value)}/>
        </label>
        <label style={labelStyle}>
            Téléphone :
            <input style={inputStyle} type="tel" value={tel_number} onChange={(e) => setTel_number(e.target.value)}/>
        </label>

        <input style={buttonStyle} type="submit" value="Create" />
    </form>
  );
}
