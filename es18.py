veicolo = input(
    'Che tipo di veicolo vuoi imbarcare? (c camion, a autovettura)')
cilindrata = input('Inserisci la cilindrata espressa in cc')

if veicolo == 'c':
    if int(cilindrata) <= 2000:
        print('Il costo è di € 40')
    elif int(cilindrata) <= 3000:
        print('Il costo è di € 50')
    else:
        print('Il costo è di € 100')
elif veicolo == 'a':
    if int(cilindrata) <= 1000:
        print('Il costo è di € 20')
    elif int(cilindrata) <= 2000:
        print('Il costo è di € 30')
    else:
        print('Il costo è di € 40')
