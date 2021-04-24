import React, { useState, useEffect } from 'react';
import axios from 'axios';
import '../../../style.css';

export default function CarpoolOffers(){
    const [carpoolOffers, setCarpoolOffers] = useState([]);

    useEffect(() => {

        axios.get(`http://localhost/fernando/ifsul-lpw3/server/src/api/carpool/offers/others/${localStorage.getItem('id')}`)
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
                                    <div>
                                        <p><strong>Contato:</strong> {carpool.phone}</p>
                                        
                                        <p><strong>Origem:</strong> {carpool.from_city}, {carpool.from_neighborhood}, {carpool.from_street}</p>
                                        
                                        <p><strong>Destino:</strong> {carpool.to_city}, {carpool.to_neighborhood}, {carpool.to_street}</p>
                                        
                                        <p><strong>De:</strong> {carpool.start_date} até {carpool.end_date}</p>
                                        
                                        <p><strong>Vagas disponíveis:</strong> {carpool.available_vacancies}</p>
                                    </div>
                                </li>
                            ))}
                        </ul>
                    </form>
                </section>
            </div>
        </body>
    );
}