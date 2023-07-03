import matplotlib.pyplot as plt,numpy as np,scipy.misc
plt.close('all'); img=plt.imread('DTI.jpg')
print(img.shape,type(img),img.dtype)
plt.imshow(img); plt.figure()
img2=np.mean(img,2); print(img2.shape)
plt.imshow(img2,cmap=plt.cm.gray)
scipy.misc.imsave('DTI_gray.jpg',img2)
