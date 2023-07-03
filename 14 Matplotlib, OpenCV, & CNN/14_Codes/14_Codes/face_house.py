import numpy as np,matplotlib.pyplot as plt
plt.close('all'); img=[]
img.append(plt.imread('face.jpg')) # for FFA
img.append(plt.imread('house.jpg')) # for PPA
k=np.arange(1,10,2)/10.0
for i in range(5):
  plt.subplot(1,5,i+1);plt.axis('off')
  hybrid=k[i]*img[0]+(1-k[i])*img[1]
  plt.imshow(hybrid/255.0)