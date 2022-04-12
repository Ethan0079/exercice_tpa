import React, { useState } from "react";

export function DeleteContact() {

    const [id, setId] = useState("");
    
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    
    var raw = JSON.stringify({
      "id": id
    });
    
    var requestOptions = {
      method: 'POST',
      body: raw
    };
    
    
    const deleteContact = (event: { preventDefault: () => void; }) => {
    fetch("http://exercice-tpa/rest-api/contact/delete.php", requestOptions)
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
        <form style={formStyle}>
            <label style={labelStyle}>
                ID :
                <input style={inputStyle} type="number" value={id} onChange={(e) => setId(e.target.value)} />
            </label>
        </form>
        <button style={buttonStyle} onClick={deleteContact}>Delete</button>
    </>
  );
}
