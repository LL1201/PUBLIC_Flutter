while True:
    nColonne = int(input('Inserisci il numero di colonne: '))
    nRighe = int(input('Inserisci il numero di righe: '))
    if(int(nColonne) > 3 and int(nRighe)):
        break


for i in range(nRighe):
    print('*', end=' ')
    for j in range(nColonne-2):
        if i == 0 or i == nRighe-1:
            print('*', end=' ')
        else:
            print('Q', end=' ')
    print('*\n')
