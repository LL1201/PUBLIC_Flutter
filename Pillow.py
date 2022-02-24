import numpy as np
from PIL import Image   #dal modulo pil importiamo l'oggetto image
arr = np.ones((960,720))*255


#crea un quadrato bianco al centro
np_white = np.ones((100,100))*0
x_offset =int(np_white.shape[0]/2)
y_offset =int(np_white.shape[1]/2)

x_start = int(arr.shape[0]/2)-x_offset
x_end = int(arr.shape[0]/2)+x_offset

y_start = int(arr.shape[1]/2)-y_offset
y_end = int(arr.shape[1]/2)+y_offset



#arr[x_start:x_end,y_start:y_end]=np_white
#arr[x_start+100:x_end+100,y_start:y_end]=np_white
#arr[x_start+200:x_end+200,y_start:y_end]=np_white
#arr[x_start+300:x_end+300,y_start:y_end]=np_white
#arr[x_start-100:x_end-100,y_start:y_end]=np_white
#arr[x_start-200:x_end-200,y_start:y_end]=np_white
#arr[x_start-300:x_end-300,y_start:y_end]=np_white
#arr[x_start-300:x_end-300,y_start-200:y_end-200]=np_white
#arr[x_start-300:x_end-300,y_start-100:y_end-100]=np_white
#arr[x_start-300:x_end-300,y_start+200:y_end+200]=np_white
#arr[x_start-300:x_end-300,y_start+100:y_end+100]=np_white

for i in range(-300, 200, 100):
    arr[x_start+i:x_end+i,y_start:y_end]=np_white

img = Image.fromarray(arr)
img.show()