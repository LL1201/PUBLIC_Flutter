import numpy as np
from PIL import Image

img=Image.open("alfa.png")
img=img.convert("L")
#img.show()

arr=np.array(img)

for i in range(0,600,1):
    for j in range(0,600,1):
       if arr[i,j]<255 and arr[i,j]>150:
           arr[i,j]=255

#print(arr)
#print(arr.shape)

img = Image.fromarray(arr)
img.show()

#np.savetxt('file.txt', arr, fmt='%.0f')