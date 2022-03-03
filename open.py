import cv2
import numpy as np

imgBW = cv2.imread('sunset.jpg', cv2.IMREAD_GRAYSCALE)
cv2.imwrite('sunsetBW.jpg', imgBW)

img = cv2.imread('sunset.jpg')
green_channel = img[:,:,2]
green_img = np.zeros(img.shape)
green_img[:,:,1] = green_channel
cv2.imwrite('sunsetGREEN.jpg', green_img)

size = 200
img_cropped = img[280:1000,1350:1720] #//fa arrotondare a intero
cv2.imwrite('sunsetCROPPED.jpg', img_cropped)


img = cv2.imread('sunsetCROPPED.jpg')
angle= 180
img_w=370
img_h=720
center = (img_w/2, img_h/2)
rot_mat =cv2.getRotationMatrix2D(center, angle, 1.)
img_rotated = cv2.warpAffine(img,rot_mat,(img_w,img_h))

cv2.imwrite('sunsetROTATED.jpg',img_rotated)
