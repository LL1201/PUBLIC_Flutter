import numpy as np
from PIL import Image

arr=np.random.randint(0, high=255, size=(650, 650))

arr[:,150]=np.zeros((650))
arr[:,105]=np.zeros((650))

img=Image.fromarray(arr)

img.show()