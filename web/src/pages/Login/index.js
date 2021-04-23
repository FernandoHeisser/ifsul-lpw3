import React, {useState} from 'react';
import { Link, useHistory } from 'react-router-dom';
import axios from 'axios';

export default function Login(){
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const history = useHistory();

    async function handleLogin(e){
        e.preventDefault();
        try{
            const response = await axios.post(`http://localhost/fernando/server/src/api/login`, {email: email, password: password});
            
            if(response.data.status === undefined && response.data !== false) {

                localStorage.setItem('id', response.data.id);
                localStorage.setItem('email', response.data.email);
                localStorage.setItem('name', response.data.name);
                localStorage.setItem('password', response.data.password);
                history.push('/home');

            } else if(response.data !== false) {
                alert(response.data.status + '\n' + response.data.message);
            } else {
                alert("Usuário não encontrado.");
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
                    <form onSubmit={handleLogin}>
                        <h1>Caronas</h1>
                        <h2>Faça seu Login</h2>
                        <input placeholder="Seu email" value={email} onChange={e => setEmail(e.target.value)} type={"email"}/>
                        <br></br><br></br>
                        <input placeholder="Sua senha" value={password} onChange={e => setPassword(e.target.value)} type={"password"}/>
                        <br></br><br></br>
                        <button className="button" type="submit">Entrar</button>
                        <br></br><br></br>
                        <Link to="/register" className="back-link">
                            Não tenho cadastro
                        </Link>
                    </form>
                </section>
            </div>
        </body>
    );
}