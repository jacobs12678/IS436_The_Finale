import express from 'express';

const app = express();

app.get('/', (req, res) => {
    res.send('The grand finale of the project!');
});
const port = process.env.PORT || 3000;
app.listen(port, () => {
    console.log('Unfortunately listening on port http://localhost:${port}');
});