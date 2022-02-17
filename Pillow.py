import numpy as np
from PIL import Image

arr=np.random.randint(0, high=255, size=(650, 650))

img=Image.fromarray(arr)
img.show()