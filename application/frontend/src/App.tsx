import './App.css';
import Box from '@mui/material/Box';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import { useState } from 'react';

interface CurrencyRow {
  currencyCodeA: Number;
  currencyCodeB: Number;
  currencyLabelA: String;
  currencyLabelB: String;
  date: Number;
  rateBuy: Number;
  rateCross: Number;
  rateSell: Number;
}

function App() {

  const [data, setData] = useState<Array<CurrencyRow>>([]);

  window.Echo.channel('CurrenciesUpdated')
    .listen('CurrenciesUpdatedEvent', (e: any) => {
      setData(e.data);
    });

  return (
    <div className="App">
      <Box>
        <TableContainer>
          <Table aria-label="simple table">
            <TableHead>
              <TableRow>
                <TableCell>Currency labels</TableCell>
                <TableCell>Sell</TableCell>
                <TableCell>Buy</TableCell>
              </TableRow>
            </TableHead>
            <TableBody>
              {data.map((row) => (
                <TableRow
                  hover
                  key={`${row.currencyLabelB}_${row.currencyLabelA}`}
                  sx={{ '&:last-child td, &:last-child th': { border: 0 } }}
                >
                  <TableCell component="th" scope="row">
                    {`${row.currencyLabelA}/${row.currencyLabelB}`}
                  </TableCell>
                  <TableCell component="th" scope="row">
                    { row.rateSell.toString() }
                  </TableCell>
                  <TableCell component="th" scope="row">
                    { row.rateBuy.toString() }
                  </TableCell>
                </TableRow>
              ))}
            </TableBody>
          </Table>
        </TableContainer>
      </Box>
    </div>
  );
}

export default App;
