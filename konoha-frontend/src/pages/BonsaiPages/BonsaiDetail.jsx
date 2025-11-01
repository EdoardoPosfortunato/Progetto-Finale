import { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import axios from 'axios';

const BonsaiDetail = () => {
  const { id } = useParams();
  const [bonsai, setBonsai] = useState(null);

  useEffect(() => {
    axios.get(`http://localhost:8000/api/bonsai/${id}`)
      .then(res => setBonsai(res.data))
      .catch(err => console.error(err));
  }, [id]);

  if (!bonsai) return <p>Caricamento...</p>;

  return (
    <div className="container my-5">
      <h2>{bonsai.nome}</h2>
      <img
        src={
          bonsai.immagine
            ? `http://localhost:8000/storage/${bonsai.immagine}`
            : '/assets/placeholder.png'
        }
        alt={bonsai.nome}
        className="img-fluid mb-3"
      />
      <p>Specie: {bonsai.species?.nome}</p>
      <p>Tipologie: {bonsai.tipologies?.map(t => t.nome).join(', ')}</p>
      <p>Descrizione: {bonsai.descrizione}</p>
    </div>
  );
};

export default BonsaiDetail;
