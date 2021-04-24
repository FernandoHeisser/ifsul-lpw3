import React, {useState} from 'react';
import { useHistory } from 'react-router-dom';
import axios from 'axios';

export default function CreateCarpoolOffer(){
    const [phone, setPhone] = useState('');
    const [fromCity, setFromCity] = useState('');
    const [fromNeighborhood, setFromNeighborhood] = useState('');
    const [fromStreet, setFromStreet] = useState('');
    const [ToCity, setToCity] = useState('');
    const [toNeighborhood, setToNeighborhood] = useState('');
    const [toStreet, setToStreet] = useState('');
    const [startDate, setStartDate] = useState('');
    const [endDate, setEndDate] = useState('');
    const [availableVacancies, setAvailableVacancies] = useState('');
    const history = useHistory();

    async function handleCreateCarpoolOffer(e){
        e.preventDefault();
        try{
            const response = await axios.post(`http://localhost/fernando/ifsul-lpw3/server/src/api/carpool/offer`,
            {
                user_id: localStorage.getItem('id'),
                phone: phone,
                from_city: fromCity,
                from_neighborhood: fromNeighborhood,
                from_street: fromStreet,
                to_city: ToCity,
                to_neighborhood: toNeighborhood,
                to_street: toStreet,
                start_date: startDate,
                end_date: endDate,
                available_vacancies: availableVacancies,
            });
            
            if(response.data.status === undefined && response.data !== false) {

                alert("Oferta de carona criada com sucesso.");
                history.push('/home');

            } else if(response.data !== false) {
                alert(response.data.status + '\n' + response.data.message);
            } else {
                alert("Erro ao criar carona, tente novamente.");
            }
        }
        catch(err){
            alert(err);
        }
    }

    return(
        <body>
            <div>
                <section>
                    <form onSubmit={handleCreateCarpoolOffer}>
                        <h1>Caronas</h1>
                        <h2>Ofereça uma carona</h2>
                        <input placeholder="Seu telefone" value={phone} onChange={e => setPhone(e.target.value)} type={"number"}/>
                        <h3>De onde você vai sair?</h3>
                        <input placeholder="Cidade" value={fromCity} onChange={e => setFromCity(e.target.value)} type={"text"}/>
                        <br></br><br></br>
                        <input placeholder="Bairro" value={fromNeighborhood} onChange={e => setFromNeighborhood(e.target.value)} type={"text"}/>
                        <br></br><br></br>
                        <input placeholder="Rua" value={fromStreet} onChange={e => setFromStreet(e.target.value)} type={"text"}/>
                        <h3>Para onde você vai?</h3>
                        <input placeholder="Cidade" value={ToCity} onChange={e => setToCity(e.target.value)} type={"text"}/>
                        <br></br><br></br>
                        <input placeholder="Bairro" value={toNeighborhood} onChange={e => setToNeighborhood(e.target.value)} type={"text"}/>
                        <br></br><br></br>
                        <input placeholder="Rua" value={toStreet} onChange={e => setToStreet(e.target.value)} type={"text"}/>
                        <h3>Qual horário?</h3>
                        <input placeholder="Inicio" value={startDate} onChange={e => setStartDate(e.target.value)} type={"datetime-local"}/>
                        <br></br><br></br>
                        <input placeholder="Fim" value={endDate} onChange={e => setEndDate(e.target.value)} type={"datetime-local"}/>
                        <h3>Quantas vagas?</h3>
                        <input placeholder="Número de vagas" value={availableVacancies} onChange={e => setAvailableVacancies(e.target.value)} type={"number"}/>
                        <br></br><br></br>
                        <button className="button" type="submit">Oferecer carona</button>
                    </form>
                </section>
            </div>
        </body>
    );
}