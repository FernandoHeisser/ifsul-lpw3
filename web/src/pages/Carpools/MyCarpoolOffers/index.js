import React, { useState, useEffect } from 'react';
import axios from 'axios';
import '../../../style.css';

export default function MyCarpoolOffers(){
    const [carpoolOffers, setCarpoolOffers] = useState([]);

    useEffect(() => {

        axios.get(`http://localhost/fernando/ifsul-lpw3/server/src/api/carpool/offers/user/${localStorage.getItem('id')}`)
        .then(response => {
            setCarpoolOffers(response.data);
        })

    }, []);

    async function handleCancelCarpoolOffer(e) {

        await axios.put(`http://localhost/fernando/ifsul-lpw3/server/src/api/cancel/offer/${e}`);
        window.location.reload();
            
    }

    return(
        <body>
            <div>
                <section>
                    <form>
                        <h1>Minhas ofertas de caronas</h1>
                        <ul>
                            {carpoolOffers.map(carpool => (
                                <li key={carpool.id}>
                                    <div>
                                        <p><strong>Contato:</strong> {carpool.phone}</p>
                                        
                                        <p><strong>Origem:</strong> {carpool.from_city}, {carpool.from_neighborhood}, {carpool.from_street}</p>
                                        
                                        <p><strong>Destino:</strong> {carpool.to_city}, {carpool.to_neighborhood}, {carpool.to_street}</p>
                                        
                                        <p><strong>De:</strong> {carpool.start_date} até {carpool.end_date}</p>
                                        
                                        <p><strong>Vagas disponíveis:</strong> {carpool.available_vacancies}</p>

                                        <button type='button' onClick={()=>handleCancelCarpoolOffer(carpool.id)}>Cancelar</button>
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