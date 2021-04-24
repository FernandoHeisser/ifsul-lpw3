import React from 'react';
import { Link } from 'react-router-dom';
import '../../style.css';

export default function Home(){
    return(
        <body>
            <div>
                <section>
                    <form>
                        <h1>Caronas</h1>
                        <h2>Olá {localStorage.getItem('name')}</h2>
                        <Link to="/carpool-offers">
                            Ofertas de carona
                        </Link>
                        <br></br><br></br>
                        <Link to="/carpool-request">
                            Solicitações de caronas
                        </Link>
                        <br></br><br></br>
                        <Link to="/my-carpool-offers">
                            Minhas ofertas
                        </Link>
                        <br></br><br></br>
                        <Link to="/my-carpool-requests">
                            Minhas solicitações
                        </Link>
                        <br></br><br></br>
                        <Link to="/create-carpool-offer">
                            Criar uma nova oferta
                        </Link>
                        <br></br><br></br>
                        <Link to="/create-carpool-request">
                            Criar uma nova solicitação
                        </Link>
                    </form>
                </section>
            </div>
        </body>
    );
}