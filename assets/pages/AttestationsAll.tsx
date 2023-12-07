import { AttestationsRenderer, } from '../components/AttestationsBodySection'
import { useQuery } from '@tanstack/react-query'
import { getAllAttestation } from '../api/attestation'

export const AttestationsAll = () =>
{
  const { data, status, error } = useQuery({
    queryKey: ['all_attestation'],
    queryFn: () => getAllAttestation(),
  }) 

  return (
    <AttestationsRenderer data={data} status={status} error={error} />
  )
}
