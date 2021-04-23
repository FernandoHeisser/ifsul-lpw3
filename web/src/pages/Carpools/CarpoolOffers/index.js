import React, { useState, useEffect } from 'react';
import axios from 'axios';

export default function CarpoolOffers(){
    const [carpoolOffers, setCarpoolOffers] = useState([]);

    useEffect(() => {

        axios.get(`http://localhost/fernando/server/src/api/carpool/offers/others/${localStorage.getItem('id')}`)
        .then(response => {
            setCarpoolOffers(response.data);
        })

    }, []);

    return(
        <body>
            <div>
                <section>
                    <form>
                        <h1>Ofertas de caronas</h1>
                        <ul>
                            {carpoolOffers.map(carpool => (
                                <li key={carpool.id}>
                                    <p>Contato: {carpool.phone}</p>
                                    
                                    <p>Origem: {carpool.from_city}, {carpool.from_neighborhood}, {carpool.from_street}</p>
                                    
                                    <p>Destino: {carpool.to_city}, {carpool.to_neighborhood}, {carpool.to_street}</p>
                                    
                                    <p>De: {carpool.start_date} até {carpool.end_date}</p>
                                    
                                    <p>Vagas disponíveis: {carpool.available_vacancies}</p>
                                </li>
                            ))}
                        </ul>
                    </form>
                </section>
            </div>
        </body>
    );
}