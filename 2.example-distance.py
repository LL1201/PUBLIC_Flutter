import numpy as np
from scipy.spatial import distance as dist #installare scipy

centroids_current = np.array([[0,1],[1,2],[3,5]])#array 3x3
centroids_previous = np.array([[1,3],[0,3],[2,5]])

D = dist.cdist(centroids_previous, centroids_current)
print(D)
#nel risultato la colonna corrisponde al frame precedente e le righe al corrente
#esempio il primo valore è la distanza tra il primo centroide del frame precedente e il primo del corrente 
rows = D.min(axis=1).argsort()
print (rows)

cols = D.argmin(axis=1)[rows]
print (rows)