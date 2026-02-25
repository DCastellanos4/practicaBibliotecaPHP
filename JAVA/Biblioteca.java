
package biblioteca;


public class Biblioteca {
    private Usuario[] usuarios;
    private Documento[] documentos;
    private final int maxUsuarios=50;
    private int numUsu;
    private final int maxDocus=200;
    private int numDocus;
    public Biblioteca(){
        usuarios=new Usuario[maxUsuarios];
        documentos=new Documento[maxDocus];
        numUsu=0;
        numDocus=0;
    }
    public void añadeDocumento(Documento doc){
        if (doc!=null){
            documentos[numDocus]=doc;
            numDocus++;
        }
    }
    public void añadeUsuario(Usuario user){
        if (user!=null){
            usuarios[numUsu]=user;
            numUsu++;
        }
    }
    public Documento buscaDocumento(String codigo){
        for (int i=0;i<numDocus;i++){
            if (documentos[i].getCodigo().equals(codigo))
                return documentos[i];
        }
        return null;
    }
    public boolean buscaUsuario(String dni){
        for (int i=0;i<numUsu;i++){
            if (usuarios[i].getDNI().equals(dni))
                return true;
        }
        return false;
    }
    public void prestaDocumento(Documento doc,Usuario user){
        if (buscaUsuario(user.getDNI())){
            if (buscaDocumento(doc.getCodigo())!=null)
                    doc.prestaAUsuario(user);
        }
    }
    public void devuelveDocumento(Documento doc){
        if (doc.estaPrestado())
            doc.devuelve();
        else
            System.out.println("Documento con código: "+ doc.getCodigo()
                    + " no estaba prestado");
    }
    public Documento buscaDocumentos(String texto){
        for(Documento v:documentos){
            if (v.getTitulo().indexOf(texto)!=-1)
                return v;
        }
        return null;
    }
    public void muestraInformePrestamos(){
        for(int i=0;i<numDocus;i++){
            if (documentos[i].estaPrestado()){
                System.out.println(documentos[i]);
            }
        }
    }
}
