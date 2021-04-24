import React, { useState, useEffect } from 'react';
import axios from 'axios';
import '../../../style.css';

export default function MyCarpoolRequest(){
    const [carpoolRequests, setCarpoolRequests] = useState([]);

    useEffect(() => {
        axios.get(`http://localhost/fernando/ifsul-lpw3/server/src/api/carpool/requests/user/${localStorage.getItem('id')}`)
        .then(response => {
            setCarpoolRequests(response.data);
        })
    }, []);

    async function handleCancelCarpoolRequest(e) {
        await axios.put(`http://localhost/fernando/ifsul-lpw3/server/src/api/cancel/request/${e}`);
        window.location.reload();    
    }

    return(
        <body>
            <div>
                <section>
                    <form>
                        <h1>Minhas solicitações de caronas</h1>
                        <ul>
                            {carpoolRequests.map(carpool => (
                                <li key={carpool.id}>
                                    <div>
                                        <p><strong>Contato:</strong> {carpool.phone}</p>
                                        
                                        <p><strong>Origem:</strong> {carpool.from_city}, {carpool.from_neighborhood}, {carpool.from_street}</p>
                                        
                                        <p><strong>Destino:</strong> {carpool.to_city}, {carpool.to_neighborhood}, {carpool.to_street}</p>
                                        
                                        <p><strong>De:</strong> {carpool.start_date} até {carpool.end_date}</p>

                                        <button type='button' onClick={()=>handleCancelCarpoolRequest(carpool.id)}>Cancelar</button>
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