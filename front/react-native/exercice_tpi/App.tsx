import * as React from 'react';
import { useState } from 'react';
import { StyleSheet, TouchableOpacity } from 'react-native';
import { Text} from 'react-native';
import { View } from 'react-native';

export default function App() {
  const [count, setCount] = useState(0);
  const onPress = () => setCount(prevCount => prevCount + 1);

  return (
    // <View style={styles.container}>
    //   <TouchableOpacityBase onPress={read} style={styles.button}>
    //     <Text style={styles.text}>Read</Text>
    //   </TouchableOpacityBase>
    // </View>
    <View style={styles.container}>
      <View style={styles.countContainer}>
        <Text>Count: {count}</Text>
      </View>
      <TouchableOpacity
        style={styles.button}
        onPress={read}
      >
        <Text>Press Here</Text>
      </TouchableOpacity>
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
    }
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
    justifyContent: "center",
    paddingHorizontal: 10
  },
  button: {
    alignItems: "center",
    backgroundColor: "#DDDDDD",
    padding: 10
  },
  countContainer: {
    alignItems: "center",
    padding: 10
  }
});
