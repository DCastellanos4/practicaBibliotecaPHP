/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package biblioteca;

public class Usuario {
    private String DNI;
    private String nombre;
    private Documento[] prestamos;
    private int maxPrestamos;
    private int limitePrestamos;
    private int numPrestamos;
    public Usuario(){
        DNI=null;
        nombre=null;
        prestamos=null;
        maxPrestamos=0;
        limitePrestamos=0;
        numPrestamos=0;
    }
    public Usuario(String dni,String nom,int maxP,int lP){
        DNI=dni;
        nombre=nom;
        prestamos=new Documento[maxP];
        maxPrestamos=maxP;
        limitePrestamos=lP;
        numPrestamos=0;
    }
    public boolean alcanzadoLimitePrestamos(){
        if (numPrestamos>=maxPrestamos)
            return true;
        return false;
    }
    public void añadeDocumentoPrestado(Documento doc){
        if (!alcanzadoLimitePrestamos()){
            if (!doc.estaPrestado()){
                prestamos[numPrestamos]=doc;
                numPrestamos++;
            }
        }
    }
    public void eliminaDocumentoPrestado(String codigo){
        int pos=buscaDocumentoPrestado(codigo);
        if (pos!= -1){
            for (int j=pos;j<numPrestamos;j++){
              prestamos[j]=prestamos[j+1];
            }
            numPrestamos--;
        }
        else
            System.out.println("El documento con código "+codigo
                                + " no está prestado");
    }
    public int buscaDocumentoPrestado(String codigo){
        for (int i=0;i<numPrestamos;i++){
            if (prestamos[i].getCodigo().equals(codigo))
                return i;
        }
        return -1;
    }
    public String getDNI() {
        return DNI;
    }
    public void setDNI(String DNI) {
        this.DNI = DNI;
    }
    public String getNombre() {
        return nombre;
    }
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    public int getMaxPrestamos() {
        return maxPrestamos;
    }
    public void setMaxPrestamos(int maxPrestamos) {
        this.maxPrestamos = maxPrestamos;
    }
    public int plazoPrestamoDocumento() {
        return limitePrestamos;
    }
    public void setLimitePrestamos(int limitePrestamos) {
        this.limitePrestamos = limitePrestamos;
    }
    public String toString(){
        return "DNI: "+ DNI + "Nombre: " + nombre + " Préstamos: " + numPrestamos;
    }
}
