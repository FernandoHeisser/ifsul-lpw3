import React, {useState} from 'react';
import { useHistory } from 'react-router-dom';
import axios from 'axios';

export default function CreateCarpoolRequest(){
    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const history = useHistory();

    async function handleRegister(e){
        e.preventDefault();
        try{
            const response = await axios.post(`http://localhost/fernando/server/src/api/carpool/request`, {name: name, email: email, password: password});
            
            if(response.data.status === undefined && response.data !== false) {

                alert("Solicitação de carona realizada com sucesso.");
                history.push('/');

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
                    <form onSubmit={handleRegister}>
                        <h1>Caronas</h1>
                        <h2>Faça seu cadastro</h2>
                        <input placeholder="Seu nome" value={name} onChange={e => setName(e.target.value)}/>
                        <br></br><br></br>
                        <input placeholder="Seu email" value={email} onChange={e => setEmail(e.target.value)} type={"email"}/>
                        <br></br><br></br>
                        <input placeholder="Sua senha" value={password} onChange={e => setPassword(e.target.value)} type={"password"}/>
                        <br></br><br></br>
                        <button className="button" type="submit">Cadastrar</button>
                    </form>
                </section>
            </div>
        </body>
    );
}