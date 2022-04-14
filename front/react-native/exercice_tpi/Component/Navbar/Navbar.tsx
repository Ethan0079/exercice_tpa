import * as React from 'react';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import IconButton from '@mui/material/IconButton';
import Typography from '@mui/material/Typography';
import Menu from '@mui/material/Menu';
import MenuIcon from '@mui/icons-material/Menu';
import Container from '@mui/material/Container';
import Avatar from '@mui/material/Avatar';
import Tooltip from '@mui/material/Tooltip';
import MenuItem from '@mui/material/MenuItem';
import Welcome from '../Home/Welcome';
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link
  } from "react-router-dom";
import { GetContactsList } from '../Contact/GetContacts';
import { CreateContact } from '../Contact/CreateContact';
import { UpdateContact } from '../Contact/UpdateContact';
import { DeleteContact } from '../Contact/DeleteContact';
import './navbar.css';


const pages = ['Home', 'Contacts', 'Other'];
const settings = ['Profile', 'Account', 'Dashboard', 'Logout'];

export default function ResponsiveAppBar() {
  const [anchorElNav, setAnchorElNav] = React.useState<null | HTMLElement>(null);
  const [anchorElUser, setAnchorElUser] = React.useState<null | HTMLElement>(null);

  const handleOpenNavMenu = (event: React.MouseEvent<HTMLElement>) => {
    setAnchorElNav(event.currentTarget);
  };

  const handleOpenUserMenu = (event: React.MouseEvent<HTMLElement>) => {
    setAnchorElUser(event.currentTarget);
  };

  const handleCloseNavMenu = () => {
    setAnchorElNav(null);
  };

  const handleCloseUserMenu = () => {
    setAnchorElUser(null);
  };

  return (
      <>
    <Router>
        <AppBar position="sticky" sx={{backgroundColor: '#B8B8B8'}}>
            <Container maxWidth="xl" >
                <Toolbar disableGutters>
                    {/* Mobile Menu */}
                <Typography
                    variant="h6"
                    noWrap
                    component="div"
                    sx={{ mr: 5, display: { xs: 'none', md: 'flex' } }}
                >BS-Team </Typography>

                <Box sx={{ flexGrow: 1, display: { xs: 'flex', md: 'none' } }}>
                    <IconButton
                    size="large"
                    aria-label="account of current user"
                    aria-controls="menu-appbar"
                    aria-haspopup="true"
                    onClick={handleOpenNavMenu}
                    color="inherit"
                    >
                    <MenuIcon />
                    </IconButton>
                    <Menu
                    id="menu-appbar"
                    anchorEl={anchorElNav}
                    anchorOrigin={{
                        vertical: 'bottom',
                        horizontal: 'left',
                    }}
                    keepMounted
                    transformOrigin={{
                        vertical: 'top',
                        horizontal: 'left',
                    }}
                    open={Boolean(anchorElNav)}
                    onClose={handleCloseNavMenu}
                    sx={{
                        display: { xs: 'block', md: 'block' },
                    }}
                    >
                    {/* {pages.map((page) => (
                        <MenuItem key={page} onClick={handleCloseNavMenu}>
                            <Typography textAlign="center">{page}</Typography>
                        </MenuItem>
                    ))} */}
                    {/* <Link style={styles.link} to="/">Home</Link> */}
                    <Link className="link" to="/getcontacts">Get contacts</Link>
                    <Link className="link" to="/createcontact">Create contact</Link>
                    <Link className="link" to="/updatecontact">Update contact</Link>
                    <Link className="link" to="/deletecontact">Delete contact</Link>
                    </Menu>
                </Box>
                {/* Desktop menu */}
                <Typography
                    variant="h6"
                    noWrap
                    component="div"
                    sx={{ flexGrow: 1, display: { xs: 'flex', md: 'none' } }}
                >BS-Team</Typography>

                <Box sx={{ flexGrow: 1, display: { xs: 'none', md: 'flex' } }}>
                    {/* {pages.map((page) => (
                    <Button
                        onClick={handleCloseNavMenu}
                        sx={{ my: 2, color: 'white', display: 'block' }}
                    >
                        {page}
                    </Button>
                    ))} */}

                    <Link to="/" className='link'>Home</Link>
                    <Link className="link" to="/getcontacts">Get contacts</Link>
                    <Link className="link" to="/createcontact">Create contact</Link>
                    <Link className="link" to="/updatecontact">Update contact</Link>
                    <Link className="link" to="/deletecontact">Delete contact</Link>
                    
                </Box>

                <Box sx={{ flexGrow: 0}}>
                    <Tooltip title="Open settings">
                    <IconButton onClick={handleOpenUserMenu} sx={{ p: 0 }}>
                        <Avatar sx={{ border: '1px solid #FFBF00'}} alt="Ethan Marchand" src="/static/images/avatar/2.jpg" />
                    </IconButton>
                    </Tooltip>
                    <Menu
                    sx={{ mt: '45px' }}
                    id="menu-appbar"
                    anchorEl={anchorElUser}
                    anchorOrigin={{
                        vertical: 'top',
                        horizontal: 'right',
                    }}
                    keepMounted
                    transformOrigin={{
                        vertical: 'top',
                        horizontal: 'right',
                    }}
                    open={Boolean(anchorElUser)}
                    onClose={handleCloseUserMenu}
                    >
                    {settings.map((setting) => (
                        <MenuItem key={setting} onClick={handleCloseUserMenu}>
                        <Typography textAlign="center">{setting}</Typography>
                        </MenuItem>
                    ))}
                    </Menu>
                </Box>
                </Toolbar>
            </Container>
        </AppBar>

        <Routes>
          <Route path="/"               element={< Welcome />}></Route>
          <Route path="/getcontacts"    element={< GetContactsList />} ></Route>
          <Route path="/createcontact"  element={< CreateContact />} ></Route>
          <Route path="/updatecontact"  element={< UpdateContact />} ></Route>
          <Route path="/deletecontact"  element={< DeleteContact />} ></Route>
        </Routes>

    </Router>
    </>
  );
}




// export default ResponsiveAppBar;