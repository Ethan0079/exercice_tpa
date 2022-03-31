import * as React from 'react';
import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, TouchableOpacityBase, View } from 'react-native';

export default function App(this: any) {
  return (
    <View style={styles.container}>
      <TouchableOpacityBase onPress={read} style={styles.button}>
        <text style={styles.buttontText}>Get data</text>
      </TouchableOpacityBase>
    </View>
  );
}

const read = () => {
  fetch('http://exercice-tpa/rest-api/contact/read.php',{
    method: 'GET',
    headers: {
      Accept: 
      'application/json',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id: 1,
    })
  })

  .then((response) => response.json())
  .then((res) => {
    alert(res.data[0].nom);
  })
  .catch((error) => {
    console.error(error);
  });
}


const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  button:{
    backgroundColor: 'red',
  },
  buttontText:{
    color: '#fff',
  }
});
