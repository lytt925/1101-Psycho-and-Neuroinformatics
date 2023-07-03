import numpy as np,matplotlib.pyplot as plt
img=[]
img.append(np.float64(plt.imread('MRI1.jpg')))
img.append(np.float64(plt.imread('MRI2.jpg')))
img.append(img[1]-img[0]) #contrast
for i in range(3):
 plt.subplot(1,3,i+1); plt.axis('off')
 plt.imshow(img[i],cmap=plt.cm.gray)