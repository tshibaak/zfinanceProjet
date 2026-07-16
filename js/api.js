export const api = "http://localhost:8000";

export async function contacts(datas) {
  
    try {
      const response = await fetch(`${api}/api/contacts/store`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(datas)
      });

      if (!response.ok) {
        throw new Error(`Erreur HTTP ${response.status}`);
      }

      const result = await response.json();

      if (result.status === "success") {
        alert("Message envoyé avec succès !");
       
      } else {
        alert("Erreur: " + result.message);
      }
    } catch (error) {
      console.error("Erreur lors de l'envoi:", error);
      alert("Impossible d'envoyer le message.");
    }
}
