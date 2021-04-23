import React from 'react';
import {BrowserRouter, Route, Switch} from 'react-router-dom';
import Login from './pages/Login';
import Home from './pages/Home';
import Register from './pages/Register';
import CarpoolOffers from './pages/Carpools/CarpoolOffers';
import CarpoolRequests from './pages/Carpools/CarpoolRequests';
import MyCarpoolOffers from './pages/Carpools/MyCarpoolOffers';
import MyCarpoolRequests from './pages/Carpools/MyCarpoolRequests';
import CreateCarpoolOffer from './pages/Carpools/CreateCarpoolOffer';
import CreateCarpoolRequest from './pages/Carpools/CreateCarpoolRequest';

export default function Routes(){
    return(
        <BrowserRouter>
            <Switch>
                <Route path="/" exact component={Login} />
                <Route path="/register" component={Register} />
                <Route path="/home" component={Home} />
                <Route path="/carpool-offers" component={CarpoolOffers} />
                <Route path="/carpool-request" component={CarpoolRequests} />
                <Route path="/my-carpool-offers" component={MyCarpoolOffers} />
                <Route path="/my-carpool-requests" component={MyCarpoolRequests} />
                <Route path="/create-carpool-offer" component={CreateCarpoolOffer} />
                <Route path="/create-carpool-request" component={CreateCarpoolRequest} />
            </Switch>
        </BrowserRouter>
    );
}