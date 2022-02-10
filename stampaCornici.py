while True:
    nColonne = input('Inserisci il numero di colonne')
    nRighe = input('Inserisci il numero di righe')
    if(int(nColonne) > 3 and int(nRighe)):
        break

indexR = 0
indexC = 0

while indexR < int(nRighe):
    print('\n')
    while indexC < int(nColonne):
        if indexR == 0:
            print('*', end=' ')
        if indexR == int(nColonne) - 1:
            print('*', end=' ')
        if indexC == 0:
            print('*', end=' ')
        indexC += 1
    indexR += 1
