import * as React from 'react';
import {useState} from 'react';
import {StyleSheet} from 'react-native';
import {Text} from 'react-native';
import {View} from 'react-native';
import {GetContactsList} from './Component/Contact/GetContacts';
import Welcome from './Component/Home/Welcome';
import Navbar from './Component/Navbar/Navbar';
import {
  BrowserRouter as Router,
  Routes,
  Route,
  Link
} from "react-router-dom";

export default function App() {
  const [count, setCount] = useState(0);
  const [result, setContact] = useState('');
  const onPress = () => setCount(prevCount => prevCount + 1);
  const [homeMenu, isHomePage] = React.useState(false);
  const [contactMenu, isContactPage] = React.useState(false);
  const [OtherMenu, isOtherPage] = React.useState(false);

  function MenuLink(props: any) {
    const isHome = props.isHomePage;
    const isContact = props.isContactPage;
    const isOther = props.isOtherPage;
    if (contactMenu) 
    {
      isHomePage(false);
      isOtherPage(false);
      return <GetContactsList />;
    } else if (homeMenu) 
    {
      isContactPage(false);
      isOtherPage(false);
      return <Welcome />;
    } else if (OtherMenu) 
    {
      isContactPage(false);
      isHomePage(false);
      return <Text>Other</Text>;
    }
    
    return <Welcome />;
  }

  return (
    <>
    <View style={styles.container}>
      <Navbar/>
      {/* <MenuLink isContactPage={contactMenu} isHomePage={homeMenu} isOtherPage={OtherMenu}/> */}
    </View>
    
  </>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    // justifyContent: "",
    paddingHorizontal: 0,
    backgroundColor: '#DBDBDB',
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
