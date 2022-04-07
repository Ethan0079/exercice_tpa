import * as React from 'react';
import {useState} from 'react';
import {StyleSheet} from 'react-native';
import {TouchableOpacity} from 'react-native';
import {Text} from 'react-native';
import {View} from 'react-native';
import {FlatList} from 'react-native';
import {ContactList} from '../Contact/ContactList';
import Navbar from '../Navbar/Navbar';

export default function App() {
  const [count, setCount] = useState(0);
  const [result, setContact] = useState('');
  const onPress = () => setCount(prevCount => prevCount + 1);
  const [contactMenu, openContactMenu] = React.useState(false);
  const [homeMenu, openHomeMenu] = React.useState(false);
  const [OtherMenu, openOtherMenu] = React.useState(false);

  function MenuLink(props:any) {
    const isContactMenu = props.IsContactMenu;
    if (contactMenu) {
      return <ContactList />;
    }
    return <Text>Hello</Text>;
  }

  return (
    <>
    <View style={styles.container}>
      <Navbar/>
      <MenuLink IsContactMenu={contactMenu} />
    </View>
    
  </>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    // justifyContent: "",
    paddingHorizontal: 0
  },
  button: {
    alignItems: "center",
    backgroundColor: "#DDDDDD",
    padding: 10
  },
  countContainer: {
    alignItems: "center",
    padding: 10
  },
  table: {
    backgroundColor: "#f5f5f5",
  }
});
